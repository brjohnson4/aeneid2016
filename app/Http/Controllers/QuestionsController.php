<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Video;
use App\Latin;
use App\Question;
use Input;
use Auth;
use App\User;
use App\Result;
use DB;

class QuestionsController extends Controller
{
	
	public function __construct()
	{
	    $this->middleware('auth');
	}
	
	public function question($url_slug) 
	{
		$video = Video::where('urlSlug', $url_slug)->first();

		$grammar_count = $video->questions->where('category_id', 1)->count();
		if ($grammar_count > 10) {
			$grammar = $video->questions->where('category_id', 1)->sortBy('correct + incorrect')->take(10);
			$question = $grammar;
		} elseif ($grammar_count > 0) {
			$grammar = $video->questions->where('category_id', 1)->random($grammar_count);
			$question = $grammar;
		}

		$translation_count = $video->questions->where('category_id', 2)->count();
		if ($translation_count > 10) {
			$translation = $video->questions->where('category_id', 2)->sortBy('correct + incorrect')->take(10);
			$question = $question->merge($translation);
		} elseif ($translation_count > 0) {
			$translation = $video->questions->where('category_id', 2)->random($translation_count);
			$question = $question->merge($translation);
		}

		$comprehension_count = $video->questions->where('category_id', 3)->count();
		if ($comprehension_count > 15) {
			$comprehension = $video->questions->where('category_id', 3)->sortBy('correct + incorrect')->take(15);
			$question = $question->merge($comprehension);
		} elseif ($comprehension_count > 0) {
			$comprehension = $video->questions->where('category_id', 3)->random($comprehension_count);
			$question = $question->merge($comprehension);
		}

		$reference_count = $video->questions->where('category_id', 4)->count();
		if ($reference_count > 4) {
			$reference = $video->questions->where('category_id', 4)->sortBy('correct + incorrect')->take(4);
			$quesiton = $question->merge($reference);
		} elseif ($reference_count > 0) {
			$reference = $video->questions->where('category_id', 4)->random($reference_count);
			$quesiton = $question->merge($reference);
		}

		$rhetoric_count = $video->questions->where('category_id', 5)->count();
		if ($rhetoric_count > 4) {
			$rhetoric = $video->questions->where('category_id', 5)->sortBy('correct + incorrect')->take(4);
			$question = $question->merge($rhetoric);
		} elseif ($rhetoric_count > 0) {
			$rhetoric = $video->questions->where('category_id', 5)->random($rhetoric_count);
			$question = $question->merge($rhetoric);
		}

		$meter_count = $video->questions->where('category_id', 6)->count();
		if ($meter_count > 2) {
			$meter = $video->questions->where('category_id', 6)->sortBy('correct + incorrect')->take(2);
			$question = $question->merge($meter);
		} elseif ($meter_count > 0) {
			$meter = $video->questions->where('category_id', 6)->random($meter_count);
			$question = $question->merge($meter);
		}

		$background_count = $video->questions->where('category_id', 7)->count();
		if ($background_count > 5) {
			$background = $video->questions->where('category_id', 7)->sortBy('correct + incorrect')->take(5);
			$question = $question->merge($background);
		} elseif ($background_count > 0) {
			$background = $video->questions->where('category_id', 7)->random($background_count);
			$question = $question->merge($background);
		}

		$question = $question->random();


		$lines = Latin::where('book', $question->book)
					->where('line', '>=', $question->lineStart)
					->where('line', '<=', $question->lineEnd)
					->where('lemma', '!=', 'p')
					->orderBy('line')
					->orderBy('line_order')
					->get();
		$answers = [
			$question->correctAnswer,
			$question->distractorA,
			$question->distractorB,
			$question->distractorC,
		];
		shuffle($answers);
		
		$numbers = Latin::where('line', '>=', $question->lineStart)
			->where('line', '<=', $question->lineEnd)
			->orderBy('line')
			->groupBy('line')
			->get();
			
		session(['questionId' => $question->id]);

		return view('videos.question', compact('video', 'question', 'lines', 'answers', 'numbers'));
	}
	
	public function answer(Request $request)
	{
		$answer = Input::get('answer');
		$question = Input::get('questionID');
		$video = Input::get('video');
		$video = Video::where('id', $video)->first();
		$correctAnswer = Question::where('id', $question)->first();

		$checkId = $request->session()->pull('questionId');
		
		if ($correctAnswer->id != $checkId)
		{
			return view('errors.504');
		}

		if ($answer == $correctAnswer->correctAnswer)
		{
			$correct_text = 'Correct!';
			$correctUser = 1;
			$correctQuestion = 0;
			
		} else {
			$correct_text = 'Incorrect!';
			$correctUser = 0;
			$correctQuestion = 1;
		}
		
		function newRating($selfRating, $opponentRating, $correct)
		{
			$q = log(10)/400;
			$pi = pi();
			$rd = 100;
			$grd = 1/(sqrt(1+3*pow($q, 2)*pow($rd, 2)/pow($pi, 2)));
			$esrrrdSelf = 1/(1 + pow(10, -$grd*($selfRating-$opponentRating)/400));
			$d2Self = pow(pow($q, 2)*pow($grd, 2)*$esrrrdSelf*(1-$esrrrdSelf), -1);
			$newRating = round($selfRating + $q/(1/($rd*$rd)+1/$d2Self)*$grd*($correct-$esrrrdSelf));
			
			return $newRating;
		}

		$newRatingQuestion = newRating($correctAnswer->rating, Auth::user()->rating, $correctQuestion);
		$newRatingUser = newRating(Auth::user()->rating, $correctAnswer->rating, $correctUser);
		
		$xp = round($correctAnswer->rating/30)*$correctUser;
		
		$lines = Latin::where('book', $correctAnswer->book)
			->where('line', '>=', $correctAnswer->lineStart)
			->where('line', '<=', $correctAnswer->lineEnd)
			->where('lemma', '!=', 'p')
			->orderBy('line')
			->orderBy('line_order')
			->get();
		
		$numbers = Latin::where('line', '>=', $correctAnswer->lineStart)
			->where('line', '<=', $correctAnswer->lineEnd)
			->orderBy('line')
			->groupBy('line')
			->get();

		Result::create([
	    	'question_id' => $correctAnswer->id, 
	    	'user_id' => Auth::user()->id, 
	    	'correct' => $correctUser, 
	    	'question_old_rating' => $correctAnswer->rating, 
	    	'question_new_rating' => $newRatingQuestion,
			'user_old_rating' => Auth::user()->rating,
			'user_new_rating' => $newRatingUser,
			'xp_gained' => $xp,
			'user_answer' => $answer,
			'correct_answer' => $correctAnswer->correctAnswer,
	 		'time_spent' => '10',
	 		'category_id' => $correctAnswer->category_id,
	 		'video_id' => $video->id,
	 		'user_name' => Auth::user()->username,
		]);
		
		User::where('id', Auth::user()->id)
			->update([
				'rating' => $newRatingUser,
				'correct' => Auth::user()->correct + $correctUser,
				'incorrect' => Auth::user()->incorrect + $correctQuestion,
				'xp' => Auth::user()->xp + $xp,
			]);
		
		Question::where('id', $correctAnswer->id)
			->update([
				'rating' => $newRatingQuestion,
				'correct' => $correctAnswer->correct + $correctUser,
				'incorrect' => $correctAnswer->incorrect + $correctQuestion,
			]);
		
		return view('videos.answer', compact('correct_text', 'video', 'correctAnswer', 'answer', 'numbers', 'lines'));
	}
	
	public function leaders()
	{
		$leaders = DB::select(DB::raw('Select *, @curRank := @curRank + 1 as rank from (Select * from users order by xp desc) as a, (select @curRank := 0) r where id > 1'));
		$grammar = DB::select(DB::raw('SELECT b.user_id, b.user_name, c.firstname, c.lastname, b.xp, @curRank := @curRank + 1 AS rank FROM (SELECT a.user_id, a.user_name, sum(a.xp_gained) AS xp FROM results a WHERE a.category_id = 1 GROUP BY user_id ORDER BY xp DESC) AS b, (SELECT @curRank := 0) r, users c where b.user_id = c.id and c.id > 1'));
		$translation = DB::select(DB::raw('SELECT b.user_id, b.user_name, c.firstname, c.lastname, b.xp, @curRank := @curRank + 1 AS rank FROM (SELECT a.user_id, a.user_name, sum(a.xp_gained) AS xp FROM results a WHERE a.category_id = 2 GROUP BY user_id ORDER BY xp DESC) AS b, (SELECT @curRank := 0) r, users c where b.user_id = c.id and c.id > 1'));
		$comprehension = DB::select(DB::raw('SELECT b.user_id, b.user_name, c.firstname, c.lastname, b.xp, @curRank := @curRank + 1 AS rank FROM (SELECT a.user_id, a.user_name, sum(a.xp_gained) AS xp FROM results a WHERE a.category_id = 3 GROUP BY user_id ORDER BY xp DESC) AS b, (SELECT @curRank := 0) r, users c where b.user_id = c.id and c.id > 1'));
		$reference = DB::select(DB::raw('SELECT b.user_id, b.user_name, c.firstname, c.lastname, b.xp, @curRank := @curRank + 1 AS rank FROM (SELECT a.user_id, a.user_name, sum(a.xp_gained) AS xp FROM results a WHERE a.category_id = 4 GROUP BY user_id ORDER BY xp DESC) AS b, (SELECT @curRank := 0) r, users c where b.user_id = c.id and c.id > 1'));
		$fos = DB::select(DB::raw('SELECT b.user_id, b.user_name, c.firstname, c.lastname, b.xp, @curRank := @curRank + 1 AS rank FROM (SELECT a.user_id, a.user_name, sum(a.xp_gained) AS xp FROM results a WHERE a.category_id = 5 GROUP BY user_id ORDER BY xp DESC) AS b, (SELECT @curRank := 0) r, users c where b.user_id = c.id and c.id > 1'));
		$meter = DB::select(DB::raw('SELECT b.user_id, b.user_name, c.firstname, c.lastname, b.xp, @curRank := @curRank + 1 AS rank FROM (SELECT a.user_id, a.user_name, sum(a.xp_gained) AS xp FROM results a WHERE a.category_id = 6 GROUP BY user_id ORDER BY xp DESC) AS b, (SELECT @curRank := 0) r, users c where b.user_id = c.id and c.id > 1'));
		$background = DB::select(DB::raw('SELECT b.user_id, b.user_name, c.firstname, c.lastname, b.xp, @curRank := @curRank + 1 AS rank FROM (SELECT a.user_id, a.user_name, sum(a.xp_gained) AS xp FROM results a WHERE a.category_id = 7 GROUP BY user_id ORDER BY xp DESC) AS b, (SELECT @curRank := 0) r, users c where b.user_id = c.id and c.id > 1'));
					
		
		return view('leaders.leaders', compact('leaders', 'grammar', 'translation', 'comprehension', 'reference', 'fos', 'meter', 'background'));
	}

}

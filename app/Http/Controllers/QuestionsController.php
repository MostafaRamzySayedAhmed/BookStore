<?php

namespace App\Http\Controllers;
use App\Models\Question;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\QuestionRequest;

use Illuminate\Http\Request;

class QuestionsController extends Controller
{
        public function question_insert(QuestionRequest $request)
        {
            // Starting The Validation Phase
            
            $id = session('ID');
            $user = User::find($id);
            $fullname = $user->full_name;
            $email = $user->email;
            $question = $request->input('question');

            // Starting The Filtration Phase
        
        $filtered_question = filter_var($question, FILTER_SANITIZE_STRING);
            
            Question::create([
                 'name' => $fullname,
                 'email' => $email,
                 'question' => $filtered_question,
                 'user_id' => $id
             ]);

            $categories = Category::get();
            return view('index', ['categories' => $categories, 'success' => 'Your Question was Sent Successfully']);
        }
}

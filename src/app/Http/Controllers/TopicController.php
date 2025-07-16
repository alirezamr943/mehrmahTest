<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Topic;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

class TopicController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            "title" => ['required'],
            "parent_node_id" => ['sometimes', 'exists:topics,id']
        ]);
        return response()->json([
            "data" => Topic::create($validated),
        ]);
    }

    // for each topic(node) gonna have random questions
    public function storeSomeQuestionForEachTopic()
    {
        $topics = Topic::all();
        foreach ($topics as $key => $topic) {
            for ($i = 0; $i < random_int(5,10); $i++) {
                $topic->questions()->create([
                    "question" => fake()->text(150)
                ]);
            }
        }
    }
    public function getTopicQuestions($topicId)
    {
        return Topic::with(['questions', 'children.questions'])
            ->where('id', $topicId)
            ->get()
            ->map(function ($topic) {
                return $this->recursion($topic);
            });
    }

    private function recursion(Topic $topic, $depth = 0)
    {
        return [
            'questions' => $topic->questions,
            'depth' => $depth,
            'children' => $topic->children->map(function ($child) use ($depth) {
                return $this->recursion($child, $depth + 1);
            })
        ];
    }
}

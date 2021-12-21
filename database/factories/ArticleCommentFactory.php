<?php

namespace Database\Factories;
use App\Models\ArticleComment;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleCommentFactory extends Factory
{
/**
     * Define the model's default state.
     *
     * @var string
     */
    protected $model = ArticleComment::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'comment' => $this->faker->text(),
        ];
    }
}

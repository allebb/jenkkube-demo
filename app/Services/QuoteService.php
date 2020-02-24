<?php


namespace App\Services;

use Illuminate\Support\Collection;

final class QuoteService
{

    /**
     * An array of quotes that I got from the internet.
     * @var string[]
     */
    private array $quotes = [
        "Art can only be truly Art by presenting an adequate outward symbol of some fact in the interior life.",
        "If you never heard opportunity knock, maybe you're never at home.",
        "Opinions differ most when there is least scientific warrant for having any.",
        "A fellow who is always declaring he's no fool usually has his suspicions.",
        "The hand that rocks the cradle Is the hand that rules the world.",
        "Competition brings out the best in products and the worst in people.",
        "If there's another world, he lives in bliss; If there is non, he made the best of this.",
        "In order that knowledge be properly digested it must have been swallowed with a good appetite.",
        "Sometimes the poorest man leaves his children the richest inheritance."
    ];

    /**
     * Returns the entire collection of quotes.
     * @return Collection
     */
    public function getAllQuotes(): Collection
    {
        return new Collection($this->quotes);
    }

    /**
     * Return a random quote.
     * @return string
     */
    public function getRandomQuote(): string
    {
        return (string)$this->getAllQuotes()->random();
    }

}

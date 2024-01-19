<?php 

namespace App\DTO\Replies;

class CreateReplyDTO
{
    public function __construct(
        public string $supportID,
        public string $content,
    )
    {}
}
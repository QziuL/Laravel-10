<?php 

namespace App\DTO\Replies;

class CreateReplyDTO
{
    public function __construct(
        public string $supportID,
        public string $content,
    ) {}

    public static function makeFromRequest(object $request): self
    {
        return new self(
            $request->support_id,
            $request->content
        );
    }
}
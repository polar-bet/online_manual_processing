<?php

namespace App\Services\User;

use App\Models\DocumentationConstructor;
use App\Models\DocumentationExample;
use App\Models\DocumentationMethod;
use App\Models\DocumentationMethodParameter;
use App\Models\DocumentationMethodRelated;
use App\Models\DocumentationParameter;
use App\Models\DocumentationRelatedClass;
use App\Models\DocumentationSyntax;

class UserService
{
    public function delete($user): void
    {
        $themes = $user->theme;
        if ($themes->count() > 0) {
            foreach ($themes as $theme) {
                foreach ($theme->themeReply as $reply) {
                    $reply->themeReplyInteraction->count() > 0 ? $reply->themeReplyInteraction->delete() : null;
                }
                $theme->themeReply->count() > 0 ? $theme->themeReply()->delete() : null;
                $theme->delete();
            }
        }
        $documentationComments = $user->documentationComment;
        if ($documentationComments->count() > 0) {
            foreach ($documentationComments as $documentationComment) {
                $documentationComment->delete();
            }
        }
        $user->documentationCommentInteraction()->count() > 0 ? $user->documentationCommentInteraction()->delete() : null;
        $exampleComments = $user->exampleComment;
        if ($exampleComments->count() > 0) {
            foreach ($exampleComments as $exampleComment) {
                $exampleComment->delete();
            }
        }
        $user->exampleCommentInteraction->count() > 0 ? $user->exampleCommentInteraction()->delete() : null;

    }

}

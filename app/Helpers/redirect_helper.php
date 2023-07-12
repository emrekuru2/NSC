<?php

function toast($type, $content)
{
    return redirect()->back()->with('toast', ['type' => $type, 'content' => $content]);
}

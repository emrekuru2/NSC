<?php

function toast($type, $content)
{
    return redirect()->back()->with('alert', ['type' => $type, 'content' => $content]);
}

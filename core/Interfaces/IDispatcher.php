<?php

namespace Core\Interfaces;

interface IDispatcher {
    public function handle(\Core\Request $request);

    public function notFound();
}
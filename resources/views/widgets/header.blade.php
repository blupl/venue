<?php $navbar = new Illuminate\Support\Fluent([
    'id'    => 'venue',
    'title' => 'Venue Operations',
    'url'   => handles('blupl::venue/member'),
    'menu'  => view('blupl/venue::widgets._menu'),
]); ?>

@decorator('navbar', $navbar)

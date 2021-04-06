<?php

Class Game extends Z_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // ----------------------------------------------------------------------- //
        // INIT
        // ----------------------------------------------------------------------- //
        
        
        // ----------------------------------------------------------------------- //
        // LOAD views and render
        // ----------------------------------------------------------------------- //
        $this->p_render('game/index');
        //$this->p_load_view('game/index', TRUE);
    }

    function iframe_game()
    {
        $this->p_render_empty('game/iframe_game', TRUE);
    }
}
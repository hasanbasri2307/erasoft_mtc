<?php

//Dashboard
Breadcrumbs::register('dashboard', function($breadcrumbs)
{
    $breadcrumbs->push('Dashboard', route('dashboard'));
});

//User
Breadcrumbs::register('user', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('User', route('user'));
});

Breadcrumbs::register('add_user', function($breadcrumbs)
{
    $breadcrumbs->parent('user');
    $breadcrumbs->push('Add', route('user.create'));
});

Breadcrumbs::register('edit_user', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('user');
    $breadcrumbs->push($user->nama, route('user.edit', $user->id_user));
});

Breadcrumbs::register('view_user', function($breadcrumbs, $user)
{
    $breadcrumbs->parent('user');
    $breadcrumbs->push($user->nama, route('user.show', $user->id_user));
});

Breadcrumbs::register('profile_user', function($breadcrumbs, $user)
{
	$breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Profile', route('user.show', $user->id_user));
});


//Software
Breadcrumbs::register('software & bugs', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Software & Bugs', '#');
});

Breadcrumbs::register('software', function($breadcrumbs)
{
    $breadcrumbs->parent('software & bugs');
    $breadcrumbs->push('Software', route('software'));
});

Breadcrumbs::register('add_software', function($breadcrumbs)
{
    $breadcrumbs->parent('software');
    $breadcrumbs->push('Add', route('software.create'));
});

Breadcrumbs::register('edit_software', function($breadcrumbs, $software)
{
    $breadcrumbs->parent('software');
    $breadcrumbs->push($software->nama, route('software.edit', $software->id_software));
});

Breadcrumbs::register('view_software', function($breadcrumbs, $software)
{
    $breadcrumbs->parent('software');
    $breadcrumbs->push($software->nama, route('software.show', $software->id_software));
});

//Bugs

<?php

Breadcrumbs::register('dashboard', function($breadcrumbs)
{
    $breadcrumbs->push('Dashboard', route('dashboard'));
});

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

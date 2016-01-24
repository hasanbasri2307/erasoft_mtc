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
Breadcrumbs::register('bugs', function($breadcrumbs)
{
    $breadcrumbs->parent('software & bugs');
    $breadcrumbs->push('Bugs', route('bugs'));
});

Breadcrumbs::register('add_bugs', function($breadcrumbs)
{
    $breadcrumbs->parent('bugs');
    $breadcrumbs->push('Add', route('bugs.create'));
});

Breadcrumbs::register('edit_bugs', function($breadcrumbs, $bugs)
{
    $breadcrumbs->parent('bugs');
    $breadcrumbs->push($bugs->nama_bugs, route('software.edit', $bugs->id_bugs));
});

Breadcrumbs::register('view_bugs', function($breadcrumbs, $bugs)
{
    $breadcrumbs->parent('bugs');
    $breadcrumbs->push($bugs->nama, route('bugs.show', $bugs->id_bugs));
});

//User
Breadcrumbs::register('client', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Client', route('client'));
});

Breadcrumbs::register('add_client', function($breadcrumbs)
{
    $breadcrumbs->parent('client');
    $breadcrumbs->push('Add', route('client.create'));
});

Breadcrumbs::register('edit_client', function($breadcrumbs, $client)
{
    $breadcrumbs->parent('client');
    $breadcrumbs->push($client->nama_pt, route('client.edit', $client->id_client));
});

Breadcrumbs::register('view_client', function($breadcrumbs, $client)
{
    $breadcrumbs->parent('client');
    $breadcrumbs->push($client->nama_pt, route('client.show', $client->id_client));
});

//tiket
Breadcrumbs::register('tiket', function($breadcrumbs)
{
    $breadcrumbs->parent('dashboard');
    $breadcrumbs->push('Tiket', route('tiket'));
});

Breadcrumbs::register('add_tiket', function($breadcrumbs)
{
    $breadcrumbs->parent('tiket');
    $breadcrumbs->push('Add', route('tiket.create'));
});

Breadcrumbs::register('edit_tiket', function($breadcrumbs, $tiket)
{
    $breadcrumbs->parent('client');
    $breadcrumbs->push($tiket->nama_pt, route('tiket.edit', $client->id_tiket));
});

Breadcrumbs::register('view_tiket', function($breadcrumbs, $tiket)
{
    $breadcrumbs->parent('client');
    $breadcrumbs->push($tiket->id_tiket, route('tiket.show', $tiket->id_tiket));
});



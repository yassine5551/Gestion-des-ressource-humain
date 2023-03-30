@extends("layouts.admin")
@section('title',$title)
@section("content")



    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between  md:space-y-0">
            <ul>
                <li>Admin</li>
                <li>Stagiaires</li>
            </ul>

        </div>
    </section>

    <div class="card has-table">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
                Stagiaires
            </p>

        </header>
    </div>

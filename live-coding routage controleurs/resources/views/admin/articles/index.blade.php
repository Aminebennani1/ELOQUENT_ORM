@extends('layouts.app')

@section('content')

<div class="content-wrapper">
          
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard</h1>
                        </div>
                        <div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger mt-3">Se déconnecter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>         
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">                           
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Tableau des articles</h3>                                  
                                </div>
                                <div>
                                    <a href="/articles/create" class="btn btn-primary">Créer un nouvel article</a>
                                </div>                                
                                <div class="card-body">
                                    <div class="row mb-3"> 
                                        <div class="col-md-4 mt-4">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Recherche...">
                                                <div class="input-group-append">
                                                    <button class="btn btn-default" type="button">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>

                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>id de l'article</th>   
                                            <th>titre de l'article</th> 
                                            <th>contenue</th>            
                                            <th>date de création</th>
                                            <th>Actions</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    @foreach($articles as $article)
                                        <tr>
                                            <td>{{$article['id']}}</td>
                                            <td>{{$article['title']}}</td>
                                            <td>{{$article['title']}}</td>
                                            <td></td>
                                            <td>
                                                <a href="/articles/{{$article['id']}}/edit" class="btn btn-primary">Modifier</a>

                                                <form action="/articles/{{$article['id']}}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </form>

                                                <a href="/articles/{{$article['id']}}" class="btn btn-primary">Afficher details</a>

                                            </td>

                                            </tr>
                                          @endforeach
                                    </tbody>
                                </table>
                            </div>
                          
                            <div class="card-footer">
                                <div class="d-flex justify-content-between align-items-center p-2">
                                    <div class="d-flex align-items-center mb-2">

                                    </div>
                                    <div class="mr-5">
                                        <ul class="pagination m-0 float-right">
                                            <li class="page-item"><a class="page-link text-secondary" href="#">«</a></li>
                                            <li class="page-item"><a class="page-link active text-secondary" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link text-secondary" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link text-secondary" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link text-secondary" href="#">»</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

       

                          
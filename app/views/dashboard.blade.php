@extends('layouts.master')

@section('title')
    FLIT: Dashboard
@stop

@section('content')
<main>
    <div class="container">
        <div>
            <div class="section">
                <div class="row">
                    <h3 class="hide-on-med-and-down">Welcome {{{Auth::user()->first_name}}}</h3>
                    <h4 class="hide-on-large-only">Welcome {{{Auth::user()->first_name}}}</h4>
                </div>
            </div>

            <div class="section">
                <div class="row">
                    <div class="col s12 center-align">
                        <!-- new projects -->
                        <a class="tooltipped" data-position="top" data-tooltip="Add New Project" href="{{{action('ProjectsController@create')}}}"><i class="z-depth-1 folder-icon large material-icons">create_new_folder</i></a>
                
                        <!-- late projects -->
                         <a class="tooltipped" data-position="top" data-tooltip="Late Projects" href="{{{action('ProjectsController@showOverdue')}}}"><i class="z-depth-1 late-icon large material-icons">assignment_late</i></a>

                        <!-- new contact -->
                        <a class="tooltipped" data-position="top" data-tooltip="Add New Client" href="{{{action('ClientsController@create')}}}"><i class="z-depth-1 person-icon large material-icons">person_add</i></a>
                    
                        <!-- all contacts -->
                        <a class="tooltipped" data-position="top" data-tooltip="All Clients" href="{{{action('ClientsController@index')}}}"><i class="z-depth-1 group-icon large material-icons">group</i></a>

                        <!-- due dates -->
                         <a class="tooltipped" data-position="top" data-tooltip="All Due Dates" href="{{{action('ProjectsController@showDueDates')}}}"><i class="z-depth-1 cal-icon large material-icons">today</i></a>
                  
                        <!-- pay dates -->
                        <a class="tooltipped" data-position="top" data-tooltip="Payment Dates" href="{{{action('ProjectsController@showPayDates')}}}"><i class="z-depth-1 money-icon large material-icons">monetization_on</i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 center-align">
                        <a id="overdueAlert" href="{{{action('ProjectsController@showOverdue')}}}">Projects Overdue: {{{$overdueProjects}}}</a>
                    </div>
                </div>
            </div>   
        </div>

        <!-- expanded index visible on horizontal tablet and larger -->
        <div class="section">
            <div class="hide-on-med-and-down">
                <h4>30 Day View</h4>
                <table class="striped centered responsive-table">
                    <thead>
                        <tr>
                            <th class="center-align" data-field="project">Project</th>
                            <th class="center-align"  data-field="dueDates">Due Date</th>
                            <th class="center-align"  data-field="projectStatus">Status</th>
                            <th class="center-align"  data-field="description" class="truncate">Description</th>
                        </tr>
                    </thead>

                    <tbody>
                            @foreach($projects as $project)
                        <tr>
                            <td><a href="{{{action('ProjectsController@show', $project->id)}}}">{{{$project->name}}}</a></td>
                            <td>{{{$project->due_date->format('m-d-Y')}}}</td>
                            <td>{{{$project->project_status}}}</td>
                            <td>{{{$project->description}}}</td>
                        </tr>
                            @endforeach
                    </tbody>
              </table>
            </div>
        </div>

        <!-- condensed index visible on vertical tablet and smaller -->
        <div class="section">
            <div id="mobile-project-index" class="hide-on-large-only">
                <h5>30 Day View</h5>
                <table class="striped centered">
                    <thead>
                        <tr>
                            <th>Project</th>    
                            <th>
                                <p>Due Date</p>
                                <p>Status</p>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                            @foreach($projects as $project)
                        <tr>
                            <td>
                                <a href="{{{action('ProjectsController@show', $project->id)}}}">{{{$project->name}}}</a>
                            </td>
                            <td>
                                <p>{{{$project->due_date->format('m-d-Y')}}}<p>
                                <p>{{{$project->project_status}}}</p>
                            </td>
                        </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@stop
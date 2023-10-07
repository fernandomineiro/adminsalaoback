@extends('layouts.app')

@section('content')
@include('layouts.headers.header',
array(
'class'=>'info',
'title'=>"Branches",'description'=>'',
'icon'=>'fas fa-home',
'breadcrumb'=>array([
'text'=>'Branch List'
])))
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header mb-3">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Branch') }}</h3>
                        </div>
                        @can('branch_create')
                        <div class="col-4 text-right">
                            <a href="{{ route('branch.create') }}"
                                class="btn btn-sm btn-primary">{{ __('Add Branch') }}</a>
                        </div>
                        @endcan
                    </div>
                </div>

                <div class="col-12">
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                </div>
                <div class="table-responsive">
                    <table id="dataTable" class="table table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Address')}}</th>
                                <th>{{__('Service For')}}</th>
                                <th>{{__('Timing')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($branch as $cat)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $cat->name}}
                                    @if ($cat->is_featured)

                                    <a href="#" class="badge badge-danger m-2 p-2">featured</a>
                                    @endif
                                </td>
                                <td>{{ $cat->address}}

                                </td>
                                <td>

                                    @if ($cat->for_who == 0)

                                    <span class="badge badge-primary m-2 p-2">{{__('Man & Women')}}</span>
                                    @elseif($cat->for_who == 1)
                                    <span class="badge badge-danger m-2 p-2">{{__('Women')}}</span>
                                    @else
                                    <span class="badge badge-default m-2 p-2">{{__('Man')}}</span>
                                    @endif
                                </td>
                                <td>
                                    {{$cat->start_time . ' to ' .$cat->end_time}}
                                </td>
                                <td>
                                    <div class="profile-picture avatar-sm mb-2 rounded-circle bg-primary text-center">

                                        <img class="mt-2 img-fluid" src="{{ asset('upload') .'/'.$cat->icon}}" alt="">
                                    </div>
                                </td>
                                <td>
                                    @if ($cat->status)
                                    <span class="badge   badge-success m-1">{{__('Active')}}</span>
                                    @else
                                    <span class="badge   badge-warning  m-1">{{__('Disabled')}}</span>

                                    @endif
                                </td>
                                <td class="d-flex">


                                    <a class="btn btn-sm btn-outline-default btn-icon m-1"
                                        href="{{ route('branch.show', $cat->id) }}">
                                        <span class="ul-btn__icon"><i class="far fa-eye"></i></span>
                                    </a>
                                    @can('branch_edit')
                                    <a class="btn btn-sm btn-outline-info btn-icon m-1"
                                        href="{{ route('branch.edit', $cat->id) }}">
                                        <span class="ul-btn__icon"><i class="fas fa-pencil-alt"></i></span>
                                    </a>
                                    @endcan
                                    @can('branch_delete')

                                    <form action="{{ route('branch.destroy', $cat) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-sm btn-outline-danger btn-icon m-1"
                                            onclick="confirm('{{ __("Are you sure you want to delete this?") }}') ? this.parentElement.submit() : ''">
                                            <span class="ul-btn__icon"><i class="far fa-trash-alt"></i></span>
                                        </button>
                                    </form>

                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

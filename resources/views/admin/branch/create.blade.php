@extends('layouts.app')

@section('content')
@include('layouts.headers.header',
array(
'class'=>'info',
'title'=>"Branches",'description'=>'',
'icon'=>'fas fa-home',
'breadcrumb'=>array([
'text'=>'Branch',
'text'=>'New Branch',
])))
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header ">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('New Branch Detail') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('branch.index') }}"
                                class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                        </div>
                    </div>
                </div>


                <div class="card-body">

                    <form action="{{ route('branch.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="validationDefault01">{{__('Name:')}}</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control  @error('name') invalid-input @enderror"
                                        placeholder="{{__('Please Enter Name')}}" autofocus required>

                                    @error('name')
                                    <div class="invalid-div">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label"
                                        for="validationDefault01">{{__('Address:')}}</label>
                                    <input type="text" name="address" value="{{ old('address') }}"
                                        class="form-control  @error('address') invalid-input @enderror"
                                        placeholder="{{__('Please Enter Address')}}" autofocus required>

                                    @error('address')
                                    <div class="invalid-div">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label"
                                        for="validationDefault01">{{__('Description:')}}</label>

                                    <textarea name="description" cols="30" rows="5"
                                        class="form-control file-input  @error('icon') invalid-input @enderror"
                                        required></textarea>
                                    @error('description')
                                    <div class="invalid-div">{{ $message }}</div>
                                    @enderror


                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label"
                                        for="validationDefault01">{{__('Open Time:')}}</label>
                                    <input type="time" name="start_time" value="{{ old('start_time') }}"
                                        class="form-control  @error('start_time') invalid-input @enderror"
                                        placeholder="{{__('Please Enter Name')}}" autofocus required>

                                    @error('start_time')
                                    <div class="invalid-div">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label"
                                        for="validationDefault01">{{__('Close Time:')}}</label>
                                    <input type="time" name="end_time" value="{{ old('end_time') }}"
                                        class="form-control  @error('end_time') invalid-input @enderror"
                                        placeholder="{{__('Please Enter Name')}}" autofocus required>

                                    @error('end_time')
                                    <div class="invalid-div">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        <label class="form-control-label" for="validationDefault01">{{__('Service For:')}}</label>
                                        <select class="js-example-basic form-control" name="for_who">
                                
                                            <option value="0">Man & Women</option>
                                            <option value="1">Women</option>
                                            <option value="2">Man</option>
                                
                                
                                        </select>
                                        @error('for_who')
                                        <div class="invalid-div">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label"
                                        for="validationDefault01">{{__('Category:')}}</label>
                                    <select class="js-example-basic form-control" name="category[]" multiple="multiple">
                                        @foreach ($categories as $cat)

                                        <option value="{{$cat['id']}}">{{$cat['name']}}</option>
                                        @endforeach

                                    </select>
                                    @error('category')
                                    <div class="invalid-div">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label"
                                        for="validationDefault01">{{__('Manager:')}}</label>
                                    <select class="js-example-basic form-control" name="manager[]" multiple="multiple">
                                        @foreach ($manager as $man)

                                        <option value="{{$man['id']}}">{{$man['name']}}</option>
                                        @endforeach

                                    </select>
                                    @error('manager')
                                    <div class="invalid-div">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label"
                                        for="validationDefault01">{{__('Employee:')}}</label>
                                    <select class="js-example-basic form-control" name="employee[]" multiple="multiple">
                                        @foreach ($employee as $emp)

                                        <option value="{{$emp['id']}}">{{$emp['name']}}</option>
                                        @endforeach

                                    </select>
                                    @error('employee')
                                    <div class="invalid-div">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label class="form-control-label" for="validationDefault01">{{__('Image:')}}</label>
                                    <input type="file" name="icon"
                                        class="form-control file-input  @error('icon') invalid-input @enderror"
                                        required accept="image/*">
                                    @error('icon')
                                    <div class="invalid-div">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group d-flex">
                                    <label class="form-control-label"
                                        for="validationDefault01">{{__('Featured Branch:')}}</label>
                                    <label class="custom-toggle custom-toggle-primary ml-2">
                                        <input type="checkbox" value="1" name="is_featured">
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                            data-label-on="Yes"></span>
                                    </label>
                                    @error('trending')
                                    <div class="invalid-div">{{ $message }}</div>
                                    @enderror


                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group d-flex">
                                    <label class="form-control-label"
                                        for="validationDefault01">{{__('Status:')}}</label>
                                    <label class="custom-toggle custom-toggle-primary ml-2">
                                        <input type="checkbox" value="1" name="status">
                                        <span class="custom-toggle-slider rounded-circle" data-label-off="No"
                                            data-label-on="Yes"></span>
                                    </label>
                                    @error('status')
                                    <div class="invalid-div">{{ $message }}</div>
                                    @enderror


                                </div>
                            </div>


                        </div>


                        <button class="btn btn-primary" type="submit">{{__('Submit')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
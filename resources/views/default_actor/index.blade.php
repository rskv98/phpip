@extends('layouts.app')

@section('content')
<legend class="text-light">
  Default actors
  <a href="default_actor/create" class="btn btn-primary float-right" data-toggle="modal" data-target="#ajaxModal" title="Default actors" data-resource="/default_actor/">Add a new default actor</a>
</legend>
<div class="row">
  <div class="col">
    <div class="card overflow-auto" style="max-height: 640px;">
      <table class="table table-striped table-hover table-sm">
        <thead>
          <tr id="filter" class="bg-primary text-light">
            <td><input class="filter-input form-control form-control-sm" data-source="/default_actor" name="Actor" placeholder="Actor" value="{{ old('Actor') }}"></td>
            <td><input class="filter-input form-control form-control-sm" data-source="/default_actor" name="Role" placeholder="Role" value="{{ old('Role') }}"></td>
            <td><input class="filter-input form-control form-control-sm" data-source="/default_actor" name="Country" placeholder="Country" value="{{ old('Country') }}"></td>
            <td><input class="filter-input form-control form-control-sm" data-source="/default_actor" name="Category" placeholder="Category" value="{{ old('Category') }}"></td>
            <td><input class="filter-input form-control form-control-sm" data-source="/default_actor" name="Client" placeholder="Client" value="{{ old('Client') }}"></td>
          </tr>
        </thead>
        <tbody id="tableList">
          @foreach ($default_actors as $default_actor)
          <tr class="reveal-hidden" data-id="{{ $default_actor->id }}">
            <td>
              <a href="/default_actor/{{ $default_actor->id }}" data-panel="ajaxPanel" title="Actor">
                {{ $default_actor->actor->name }}
              </a>
            </td>
            <td>{{ empty($default_actor->roleInfo) ? '' : $default_actor->roleInfo->name }}</td>
            <td>{{ empty($default_actor->country) ? '' : $default_actor->country->name }}</td>
            <td>{{ empty($default_actor->category) ? '' : $default_actor->category->category }}</td>
            <td>{{ empty($default_actor->client) ? '' : $default_actor->client->name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="col-5">
    <div class="card border-info">
      <div class="card-header bg-info text-light">
        Default actor information
      </div>
      <div class="card-body p-2" id="ajaxPanel">
        <div class="alert alert-info" role="alert">
          Click on line to view and edit details
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')

@include('tables.table-js')

@stop

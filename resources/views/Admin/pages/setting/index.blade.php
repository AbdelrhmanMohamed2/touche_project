@extends('Admin.layouts.master')


@section('title')
    | Settings
@endsection

@section('css')
@endsection

@section('page_name')
    Settings
@endsection

@section('page_header')
    All Settings
@endsection



@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Setting Name</th>
                <th>Setting Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($settings as $setting)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $setting->name }}</td>
                    <td>{{ $setting->value }}</td>
                    <td>
                        <a href="{{ route('admin.settings.edit', $setting->id) }}" class="btn-sm btn-info">Edit</a>
                    </td>

                </tr>
            @endforeach
            {{-- <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $setting->name }}</td>
                    <td>{{ $setting->value }}</td> --}}

            {{-- <td>
                        <a href="{{ route('chefs.show', $chef->id) }}" class="btn btn-info btn-sm"> <i class="fas fa-folder">
                            </i> Details</a>
                        <a href="{{ route('chefs.edit', $chef->id) }}" class="btn btn-warning m-1 btn-sm"><i
                                class="fas fa-pencil-alt">
                            </i> Edit</a>
                        <form action="{{ route('chefs.destroy', $chef->id) }}" class="d-inline" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                        </form>
                    </td> --}}

            {{-- </tr>
            @endforeach --}}

        </tbody>
    </table>
@endsection


@section('scripts')
@endsection

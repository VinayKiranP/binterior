 <table class="table table-bordered datatable">
    <thead>
    <tr>
        <th class="text-center" scope="col">No</th>
        <th class="text-center" scope="col">Pictures</th>
        <th class="text-center" scope="col">Name</th>
        <th class="text-center" scope="col">Interior Type</th>
        <th class="text-center" scope="col">Description</th>
        <th class="text-center" scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($portfolios as $portfolio)
        <tr>
            <th class="text-center" scope="row">{{$loop->iteration}}</th>
            <td class="text-center"><img src="{{ asset('assets/img/'.$portfolio->image) }}" width="200px" alt=""></td>
            <td class="text-center">{{$portfolio->name}}</td>
            <td class="text-center">{{$portfolio->type_interior->name}} Interior</td>
            <td class="text-center">{{$portfolio->description}}</td>
            <td class="text-center">
                <a href="{{route('employee.portfolio.edit',$portfolio->id)}}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$portfolio->id}}">
                    <i class="bi bi-trash-fill"></i>
                </button>
                @include('portfolio.modal')
            </td>
        </tr>
    @empty
        <tr>
            <td>Tidak ada data</td>
        </tr>
    @endforelse
    </tbody>
</table>
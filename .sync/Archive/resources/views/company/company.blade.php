@extends('company.header.header')

@section('body')
        <tbody>
    @foreach ($companys as $company)     
          <tr>
            <td>{{$company->id}}</td>
            <td>{{$company->company_name}}</td>

            <td>
            @if($company->athletes_count)
               {{$company->athletes_count}}
            @endif
            </td>

            <td>
            @if($company->teams_count)
               {{$company->teams_count}}
            @endif
            </td>
            <td><a href="/company/{{$company->id}}/edit" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>UPDATE</a></td>
          </tr>
    @endforeach
        </tbody>
      </table>


</form>
@endsection
{{ $companys->links() }}
@section('footer')
  @parent


@endsection
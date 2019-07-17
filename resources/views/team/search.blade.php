@extends('company.header.header')

@section('body')
        <tbody>
    @foreach($searchResults as $searchResult)     
          <tr>
            <td>{{$searchResult->company_name}}</td>
            <td>{{$searchResult->id}}</td>

            <td>
{{$searchResult->company_status}}
            </td>

            <td>

            </td>
            <td><a href="/team/{{$searchResult->id}}/edit" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>UPDATE</a></td>
          </tr>
    @endforeach
        </tbody>
      </table>


</form>
@endsection

@section('footer')
  @parent


@endsection
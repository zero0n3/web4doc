@extends('company.header.header')

@section('body')
        <tbody>
    @foreach($searchResults as $searchResult)     
          <tr>
            <td>{{$searchResult->type}}</td>
            <td>{{$searchResult->title}}</td>

            <td>
{{$searchResult->url}}
            </td>

            <td>

            </td>
            <td><a href="/company/{{$searchResult->type}}/edit" class="waves-effect waves-light btn-small"><i class="tiny material-icons left">edit</i>UPDATE</a></td>
          </tr>
    @endforeach
        </tbody>
      </table>


</form>
@endsection

@section('footer')
  @parent


@endsection
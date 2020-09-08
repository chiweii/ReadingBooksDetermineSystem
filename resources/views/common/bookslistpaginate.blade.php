
@foreach ($booksList as $books)
	<tr>
	  <td class="book_name">{{ $books->book_name }}</td>
	  <td>{{ $books->ISBN }}</td>
	  <td>{{ $books->author }}</td>
	  <td>{{ $books->publisher }}</td>
	  <td>{{ $books->publish_year }}</td>
	  <td>{{ $books->block }}</td>
	</tr>
@endforeach
<tr>
   <td colspan="6" align="center">
    {!! $booksList->links() !!}
   </td>
</tr>

# N+1 problem and Eager loading demo

### N+1 query problem
When we are working with laravel relationships, sometimes we will need to fetch data from several tables.
Even though laravel makes it easy for us, if you are not careful particularly with loop
it runs countless database queries. thats why it is referred as n+1 problem.

### Eager Loading
Laravel Eloquent can "eager load" relationships at the time you query the parent model

### Example
Post model has two relationships as follows.
```php
class Post extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
```
the following are possible eager loading samples of relationships.
```php
// $posts = \App\Post::all();
// $posts = \App\Post::with('author')->get();
// $posts = \App\Post::with(['author', 'comments'])->get();
$posts = \App\Post::withCount('comments')->with('author')->get();
```

#### example view
```blade
<table class="table">
    <tr>
        <th>Title</th>
        <th>Comments</th>
        <th>Author</th>
    </tr>
    @foreach($posts as $post)
    <tr>
        <td>{{ $post->title }}</td>
        <td>{{ $post->comments_count }}</td>
        <td>{{ $post->author->name }}</td>
    </tr>
    @endforeach
</table>
```

<h2>Create a Folder</h2>

<form action="/folders" method="post">
    @csrf
    @method("PATCH")
    <input type="text" name="name" id="name" value={{ $folder->name }}>
    <button type="submit">Submit</button>
    <button>Cancel</button>
</form>
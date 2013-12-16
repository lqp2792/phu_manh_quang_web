
<div class="full_w">
    <div class="h_title">Paragraph, headers, lists, notify</div>
        <h1>Level 1 header</h1>
        <p>abc</p>
        <h2>Level 2 header</h2>
        <p>abc</p>
        <h3>Level 3 header</h3>
        <p>abc</p>
        <h3>Unordered list</h3>
        <ul>
            <li>a1</li>
            <li>a2</li>
            <li>a3</li>
            <li>a4</li>
        </ul>
        <h3>Ordered list</h3>
        <ol>
            <li>b1</li>
            <li>b2</li>
            <li>b3</li>
            <li>b4</li>
        </ol>
        <div class="n_warning"><p>warning</p></div>
        <div class="n_ok"><p>ok</p></div>
        <div class="n_error"><p>error</p></div>
</div>
<div class="full_w">
    <div class="h_title">Add new page - form elements</div>
    <form action="" method="post">
    <div class="element">
        <label for="name">Page title <span class="red">(required)</span></label>
        <input id="name" name="name" class="text err" />
    </div>
    <div class="element">
        <label for="category">Category <span class="red">(required)</span></label>
        <select name="category" class="err">
            <option value="0">-- select category</option>
            <option value="1">Category 1</option>
            <option value="2">Category 4</option>
            <option value="3">Category 3</option>
        </select>
    </div>
    <div class="element">
        <label for="comments">Comments</label>
        <input type="radio" name="comments" value="on" checked="checked" /> Enabled <input type="radio" name="comments" value="off" /> Disabled
    </div>
    <div class="element">
        <label for="attach">Attachments</label>
        <input type="file" name="attach" />
</div>
<div class="element">
    <label for="content">Page content <span>(required)</span></label>
    <textarea name="content" class="textarea" rows="10"></textarea>
</div>
<div class="entry">
    <button type="submit">Preview</button> <button type="submit" class="add">Save page</button> <button class="cancel">Cancel</button>
</div>
</form>
</div>

<div class="full_w">
<div class="h_title">Manage pages - table</div>
<h2>Lorem ipsum dolor sit ame</h2>
<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumyeirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diamvolupt</p>

<div class="entry">
<div class="sep"></div>
</div>
<table>
<thead>
<tr>
    <th scope="col">ID</th>
    <th scope="col">Title</th>
    <th scope="col">Author</th>
    <th scope="col">Date</th>
    <th scope="col">Category</th>
    <th scope="col" style="width: 65px;">Modify</th>
</tr>
</thead>

<tbody>
<tr>
    <td class="align-center">2</td>
    <td>Home</td>
    <td>Paweł B.</td>
    <td>22-03-2012</td>
    <td>-</td>
    <td>
        <a href="#" class="table-icon edit" title="Edit"></a>
        <a href="#" class="table-icon archive" title="Archive"></a>
        <a href="#" class="table-icon delete" title="Delete"></a>
    </td>
</tr>
<tr>
    <td class="align-center">3</td>
    <td>Our offer</td>
    <td>Paweł B.</td>
    <td>22-03-2012</td>
    <td>-</td>
    <td>
        <a href="#" class="table-icon edit" title="Edit"></a>
        <a href="#" class="table-icon archive" title="Archive"></a>
        <a href="#" class="table-icon delete" title="Delete"></a>
    </td>
</tr>

<tr>
    <td class="align-center">5</td>
    <td>About</td>
    <td>Admin</td>
    <td>23-03-2012</td>
    <td>-</td>
    <td>
        <a href="#" class="table-icon edit" title="Edit"></a>
        <a href="#" class="table-icon archive" title="Archive"></a>
        <a href="#" class="table-icon delete" title="Delete"></a>
    </td>
</tr>

<tr>
    <td class="align-center">12</td>
    <td>Contact</td>
    <td>Admin</td>
    <td>25-03-2012</td>
    <td>-</td>
    <td>
        <a href="#" class="table-icon edit" title="Edit"></a>
        <a href="#" class="table-icon archive" title="Archive"></a>
        <a href="#" class="table-icon delete" title="Delete"></a>
    </td>
</tr>
<tr>
    <td class="align-center">114</td>
    <td>Portfolio</td>
    <td>Paweł B.</td>
    <td>22-03-2012</td>
    <td>-</td>
    <td>
        <a href="#" class="table-icon edit" title="Edit"></a>
        <a href="#" class="table-icon archive" title="Archive"></a>
        <a href="#" class="table-icon delete" title="Delete"></a>
    </td>
</tr>

<tr>
    <td class="align-center">116</td>
    <td>Clients</td>
    <td>Admin</td>
    <td>23-03-2012</td>
    <td>-</td>
    <td>
        <a href="#" class="table-icon edit" title="Edit"></a>
        <a href="#" class="table-icon archive" title="Archive"></a>
        <a href="#" class="table-icon delete" title="Delete"></a>
    </td>
</tr>

<tr>
    <td class="align-center">131</td>
    <td>Customer reviews</td>
    <td>Admin</td>
    <td>25-03-2012</td>
    <td>-</td>
    <td>
        <a href="#" class="table-icon edit" title="Edit"></a>
        <a href="#" class="table-icon archive" title="Archive"></a>
        <a href="#" class="table-icon delete" title="Delete"></a>
    </td>
</tr>
</tbody>
</table>
<div class="entry">
<div class="pagination">
    <span>« First</span>
    <span class="active">1</span>
    <a href="">2</a>
    <a href="">3</a>
    <a href="">4</a>
    <span>...</span>
    <a href="">23</a>
    <a href="">24</a>
    <a href="">Last »</a>
</div>
<div class="sep"></div>
<a class="button add" href="">Add new page</a> <a class="button" href="">Categories</a>
</div>
</div>
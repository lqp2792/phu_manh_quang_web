<div class="full_w">
    <div class="h_title">Register Form</div>
    <form action="Homepage/Register/" method="post">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" /></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" /></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirm_password" /></td>
            </tr>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="first_name" /></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="last_name" /></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" /></td>
                <td><select name="postfix">
                        <option value="@gmail.com">@gmail.com</option>
                        <option value="@yahoo.com">@yahoo.com</option>
                        <option value="@hotmail.com">@hotmail.com</option>
                    </select></td>
            </tr>
            <tr>
                <td>Phone Number:</td>
                <td><input type="text" name="phone_number" /></td>
            </tr>
            <tr>
                <td><input class="button" type="submit" name="submit" value="Register" /></td>
            </tr>
        </table>
    </form>
</div>

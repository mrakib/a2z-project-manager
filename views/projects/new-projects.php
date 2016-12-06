<div class="wrap">
    <h1>Create new project</h1>

    <form method="post">
        <div>
            <label>Project name</label>
            <input type="text" name="project_name" value="">
        </div>

        <div>
            <label>Project Description</label>
            <input type="text" name="project_name" value="">
        </div>

        <div>
            <label>Project category</label>
            <select>
                <option value="hard">Hard</option>
                <option value="easy">Easy</option>
                <option value="soft">Soft</option>
            </select>
        </div>

        <div>
            <?php wp_nonce_field( 'a2zpm-project-create-action', 'a2zpm-project-create-nonce' ); ?>
            <input class="button button-primary" type="submit" name="a2zpm_project_create">
        </div>
    </form>
</div>
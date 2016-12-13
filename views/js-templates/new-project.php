 <div class="a2zpm-new-projects-wrap white-popup">
    <h1>Create new project</h1>

    <form method="post" id="a2zpm-new-projects-form">
        <div>
            <label>Project name</label>
            <input type="text" name="project_name" value="">
        </div>

        <div>
            <label>Project Description</label>
            <input type="text" name="project_desc" value="">
        </div>

        <input type="hidden" name="post_type" value="project">

        <div>
            <label>Project category</label>
            <select>
                <option value="hard">Hard</option>
                <option value="easy">Easy</option>
                <option value="soft">Soft</option>
            </select>
        </div>

        <div>
            <input class="button button-primary" type="submit" name="a2zpm_project_create">
        </div>
    </form>
</div>

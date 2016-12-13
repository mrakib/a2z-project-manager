<div class="wrap a2zpm-projects" id="a2zpm-projects">

    <h2>
        <?php _e( 'Projects', A2ZPM_TEXTDOMAIN ); ?>
        <!-- <a href="<?php echo add_query_arg( ['page' => 'a2zpm-project', 'section' => 'new-project' ], admin_url( 'admin.php' ) ); ?>" id="a2zpm-add-new-prject" class="add-new-h2"><?php _e( 'Add New Project', A2ZPM_TEXTDOMAIN ) ?></a> -->
    </h2>

    <div class="a2zpm-projects-wrap">
        <div class="wrap">
		    <h1>Create new project</h1>

		    <form method="post">
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
		            <?php wp_nonce_field( 'a2zpm-project-create-action', 'a2zpm-project-create-nonce' ); ?>
		            <input class="button button-primary" type="submit" name="a2zpm_project_create">
		        </div>
		    </form>
		</div>
    </div>
</div>
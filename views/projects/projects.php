<div class="wrap a2zpm-projects" id="a2zpm-projects">

    <h2>
        <?php _e( 'Projects', A2ZPM_TEXTDOMAIN ); ?>
        <a href="#" id="a2zpm-add-new-prject" class="add-new-h2"><?php _e( 'Add New Project', A2ZPM_TEXTDOMAIN ) ?></a>
    </h2>

    <div class="project-list">
        <?php
        $projects = a2zpm_get_projects();
        ?>
        <ul>
            <?php foreach ( $projects as $project ): ?>
                <li><?php echo $project->post_title; ?></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>
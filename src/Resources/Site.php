<?php

namespace Laravel\Forge\Resources;

class Site extends Resource
{
    /**
     * The id of the site.
     *
     * @var int
     */
    public $id;

    /**
     * The id of the server.
     *
     * @var int
     */
    public $serverId;

    /**
     * The name of the site.
     *
     * @var string
     */
    public $name;

    /**
     * The aliases of the site.
     *
     * @var array
     */
    public $aliases;

    /**
     * The name of the directory housing the site.
     *
     * @var string
     */
    public $directory;

    /**
     * Determine if the site allows Wildcard Sub-Domains.
     *
     * @var bool
     */
    public $wildcards;

    /**
     * The status of the site.
     *
     * @var string
     */
    public $status;

    /**
     * The deployment git repository.
     *
     * @var string
     */
    public $repository;

    /**
     * The type of the repository provider.
     *
     * @var string
     */
    public $repositoryProvider;

    /**
     * The name of the deployment branch.
     *
     * @var string
     */
    public $repositoryBranch;

    /**
     * The status of the repository.
     *
     * @var string
     */
    public $repositoryStatus;

    /**
     * Determine if "Quick Deploy" is enabled for the site.
     *
     * @var bool
     */
    public $quickDeploy;

    /**
     * The status of the deployment.
     *
     * @var string|null
     */
    public $deploymentStatus;

    /**
     * The type of the project installed on the site.
     *
     * @var string
     */
    public $projectType;

    /**
     * The application installed on the site.
     *
     * @var string
     */
    public $app;

    /**
     * The status of the application installed.
     *
     * @var string
     */
    public $appStatus;

    /**
     * Hipchat room for deployment notifications.
     *
     * @var string
     */
    public $hipchatRoom;

    /**
     * Slack channel for deployment notifications.
     *
     * @var string
     */
    public $slackChannel;

    /**
     * Telegram chat ID for deployment notifications.
     *
     * @var string
     */
    public $telegramChatId;

    /**
     * Telegram chat title (username) for deployment notifications.
     *
     * @var string
     */
    public $telegramChatTitle;

    /**
     * Microsoft Teams webhook URL for deployment notifications.
     *
     * @var string
     */
    public $teamsWebhookUrl;

    /**
     * Discord webhook URL for deployment notifications.
     *
     * @var string
     */
    public $discordWebhookUrl;

    /**
     * The username the site is running under.
     *
     * @var string
     */
    public $username;

    /**
     * The status of load balancing.
     *
     * @var string
     */
    public $balancingStatus;

    /**
     * The The date/time the site was created.
     *
     * @var string
     */
    public $createdAt;

    /**
     * The URL used to trigger a site deploy.
     *
     * @var string
     */
    public $deploymentUrl;

    /**
     * Is the site using HTTPS.
     *
     * @var bool
     */
    public $isSecured;

    /**
     * The PHP Version of the site, if any.
     *
     * @var string|null
     */
    public $phpVersion;

    /**
     * The aliases of the site.
     *
     * @var array
     */
    public $tags;

    /**
     * Refresh the site token.
     *
     * @return void
     */
    public function refreshToken()
    {
        $this->forge->refreshSiteToken($this->serverId, $this->id);
    }

    /**
     * Delete the given site.
     *
     * @return void
     */
    public function delete()
    {
        $this->forge->deleteSite($this->serverId, $this->id);
    }

    /**
     * Install a git repository on the given site.
     *
     * @param  bool  $wait
     * @return \Laravel\Forge\Resources\Site
     */
    public function installGitRepository(array $data, $wait = true)
    {
        return $this->forge->installGitRepositoryOnSite($this->serverId, $this->id, $data, $wait);
    }

    /**
     * Update the site's git repository parameters.
     *
     * @return void
     */
    public function updateGitRepository(array $data)
    {
        $this->forge->updateSiteGitRepository($this->serverId, $this->id, $data);
    }

    /**
     * Destroy the git-based project installed on the site.
     *
     * @param  bool  $wait
     * @return void
     */
    public function destroyGitRepository($wait = true)
    {
        $this->forge->destroySiteGitRepository($this->serverId, $this->id, $wait);
    }

    /**
     * Create a new deploy key on the site.
     *
     * @return array
     */
    public function createDeployKey()
    {
        return $this->forge->createSiteDeployKey($this->serverId, $this->id);
    }

    /**
     * Destroy the deploy key on the site.
     *
     * @return void
     */
    public function destroyDeployKey()
    {
        $this->forge->destroySiteDeployKey($this->serverId, $this->id);
    }

    /**
     * Get the content of the site's deployment script.
     *
     * @return string
     */
    public function getDeploymentScript()
    {
        return $this->forge->siteDeploymentScript($this->serverId, $this->id);
    }

    /**
     * Update the content of the site's deployment script.
     *
     * @param  string  $content
     * @param  bool  $autoSource
     * @return void
     */
    public function updateDeploymentScript($content, $autoSource = false)
    {
        $this->forge->updateSiteDeploymentScript($this->serverId, $this->id, $content, $autoSource);
    }

    /**
     * Enable "Quick Deploy" for the given site.
     *
     * @return void
     */
    public function enableQuickDeploy()
    {
        $this->forge->enableQuickDeploy($this->serverId, $this->id);
    }

    /**
     * Disable "Quick Deploy" for the given site.
     *
     * @return void
     */
    public function disableQuickDeploy()
    {
        $this->forge->disableQuickDeploy($this->serverId, $this->id);
    }

    /**
     * Deploy the given site.
     *
     * @param  bool  $wait
     * @return \Laravel\Forge\Resources\Site
     */
    public function deploySite($wait = true)
    {
        return $this->forge->deploySite($this->serverId, $this->id, $wait);
    }

    /**
     * Reset deployment status for a given site.
     *
     * @return void
     */
    public function resetDeploymentState()
    {
        return $this->forge->resetDeploymentState($this->serverId, $this->id);
    }

    /**
     * Get the last deployment log of the site.
     *
     * @return string
     */
    public function siteDeploymentLog()
    {
        return $this->forge->siteDeploymentLog($this->serverId, $this->id);
    }

    /**
     * Get the deployments history of the site.
     *
     * @return string
     */
    public function getDeploymentHistory()
    {
        return $this->forge->deploymentHistory($this->serverId, $this->id);
    }

    /**
     * Get a single deployment from the deployment history of a site.
     *
     * @param  int  $deploymentId
     * @return string
     */
    public function getDeploymentHistoryDeployment($deploymentId)
    {
        return $this->forge->deploymentHistoryDeployment($this->serverId, $this->id, $deploymentId);
    }

    /**
     * Get the output for a deployment of the site.
     *
     * @param  int  $deploymentId
     * @return string
     */
    public function getDeploymentHistoryOutput($deploymentId)
    {
        return $this->forge->deploymentHistoryOutput($this->serverId, $this->id, $deploymentId);
    }

    /**
     * Enable Hipchat Notifications for the given site.
     *
     * @return void
     */
    public function enableHipchatNotifications(array $data)
    {
        $this->forge->enableHipchatNotifications($this->serverId, $this->id, $data);
    }

    /**
     * Disable Hipchat Notifications for the given site.
     *
     * @return void
     */
    public function disableHipchatNotifications()
    {
        $this->forge->disableHipchatNotifications($this->serverId, $this->id);
    }

    /**
     * Set the deployment failure emails for a site.
     *
     * @return void
     */
    public function setDeploymentFailureEmails(array $data)
    {
        $this->forge->setDeploymentFailureEmails($this->serverId, $this->id, $data);
    }

    /**
     * Install a new WordPress project.
     *
     * @return void
     */
    public function installWordPress(array $data)
    {
        $this->forge->installWordPress($this->serverId, $this->id, $data);
    }

    /**
     * Remove the WordPress project installed on the site.
     *
     * @return void
     */
    public function removeWordPress()
    {
        $this->forge->removeWordPress($this->serverId, $this->id);
    }

    /**
     * Install a new phpMyAdmin project.
     *
     * @return void
     */
    public function installPhpMyAdmin(array $data)
    {
        $this->forge->installPhpMyAdmin($this->serverId, $this->id, $data);
    }

    /**
     * Remove phpMyAdmin and revert the site back to a default state.
     *
     * @return void
     */
    public function removePhpMyAdmin()
    {
        $this->forge->removePhpMyAdmin($this->serverId, $this->id);
    }

    /**
     * Change the site's PHP version.
     *
     * @param  string  $version
     * @return void
     */
    public function changePHPVersion($version)
    {
        $this->forge->changeSitePHPVersion($this->serverId, $this->id, $version);
    }

    /**
     * Return the aliases associated with the site.
     *
     * @param  string|null  $separator
     * @return string
     */
    public function tags($separator = null)
    {
        return $this->transformTags($this->tags, $separator);
    }

    /**
     * Get the log for this site.
     *
     * @return string
     */
    public function siteLog()
    {
        return $this->forge->siteLog($this->serverId, $this->id);
    }

    /**
     * Remove the log for this site.
     *
     * @return void
     */
    public function deleteSiteLog()
    {
        return $this->forge->deleteSiteLog($this->serverId, $this->id);
    }
}

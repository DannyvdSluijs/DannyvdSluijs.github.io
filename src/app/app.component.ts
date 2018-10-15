import { Component, OnInit } from '@angular/core';
import { GithubService } from './github.service';
import { BlogService } from './blog.service';
import { GithubRepository } from './github-repository';
import { GithubActivity } from './github-activity';
import { BlogPost } from './models/BlogPost';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent implements OnInit {

    title = 'dannyvandersluijs.nl';

    repositories: GithubRepository[] = [];
    activities: GithubActivity[] = [];
    blogPosts: BlogPost[] = [];

    constructor(private gitHubService: GithubService, private blogService: BlogService) { }

    ngOnInit() {
      this.getRepositories();
      this.getActivities();
      this.getBlogPosts();
    }

    getRepositories(): void {
      this.gitHubService.getRepositories()
        .subscribe(repositories => this.repositories = repositories);
    }

    getActivities(): void {
        this.gitHubService.getActivities()
            .subscribe(activities => {
                activities.map(activity => {
                  const gitHubActivity: GithubActivity = new GithubActivity();
                  Object.assign(gitHubActivity, activity);
                  this.activities.push(gitHubActivity);
                });
            });
    }

    getBlogPosts(): void {
        this.blogService.getPosts()
            .subscribe(posts => {
                posts.map(post => {
                    const blogPost: BlogPost = new BlogPost();
                    Object.assign(blogPost, post);
                    this.blogPosts.push(blogPost);
                    console.log(blogPost);
                });
            });
    }
}

import { Component, OnInit } from '@angular/core';
import { GithubService } from './github.service';
import { BlogService } from './blog.service';
import { Repository } from './models/GitHub/Repository';
import { Activity } from './models/GitHub/Activity';
import { BlogPost } from './models/BlogPost';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent implements OnInit {

    title = 'dannyvandersluijs.nl';

    repositories: Repository[] = [];
    activities: Activity[] = [];
    blogPosts: BlogPost[] = [];
    menuCollapsed = true;

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
                  const gitHubActivity: Activity = new Activity();
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
                });
            });
    }
}

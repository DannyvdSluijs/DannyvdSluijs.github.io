import { Component, OnInit } from '@angular/core';

import { GithubService } from '../github.service';
import { Repository } from '../models/GitHub/Repository';
import {map} from 'rxjs/operators';

@Component({
  selector: 'app-github',
  templateUrl: './github.component.html',
  styleUrls: ['./github.component.css']
})
export class GithubComponent implements OnInit {

  repositories: Repository[];

  constructor(private gitHubService: GithubService) { }

  ngOnInit() {
    this.getRepositories();
  }

  getRepositories(): void {
    this.gitHubService.getRepositories()
      .pipe(map(data => data.filter(githubRepository => githubRepository.fork === false)))
      .subscribe(repositories => this.repositories = repositories);
  }
}

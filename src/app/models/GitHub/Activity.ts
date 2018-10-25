import {ActivityPayload} from './ActivityPayload';

export class Activity {
    id: number;
    type: GithubActivityType;
    actor: {id: number, login: string, display_login: string, gravatar_id: string, url: string, avatar_url: string};
    repo: { id: number; name: string, url: string };
    payload: ActivityPayload = new ActivityPayload();
    public: boolean;
    created_at: string;


    isWatchEvent(): boolean {
        return this.type === GithubActivityType.WatchEvent;
    }

    isPushEvent(): boolean {
        return this.type === GithubActivityType.PushEvent;
    }

    isCreateEvent(): boolean {
        return this.type === GithubActivityType.CreateEvent;
    }

    getHumanisedType(): string {
        switch (this.type) {
            case GithubActivityType.WatchEvent:
                return 'Starred';
            case GithubActivityType.PushEvent:
                return 'Pushed to';
            case GithubActivityType.CreateEvent:
                return 'Created new ' + this.payload.ref_type + ' on ';
            case GithubActivityType.IssueCommentEvent:
                return 'Commented on ';
            case GithubActivityType.PullRequestEvent:
                return 'Opened pull request on ';
            default:
                return this.type;
        }
    }

    getHtmlUrl(): string {
        switch (this.type) {
            case GithubActivityType.PushEvent:
                return this.payload
                    .commits[0]
                    .url
                    .replace('https://api.github.com/repos/', 'https://github.com/')
                    .replace('/commits/', '/commit/');
                return 'Created';
            case GithubActivityType.IssueCommentEvent:
                return  this.payload
                    .comment
                    .html_url;
            case GithubActivityType.PullRequestEvent:
                return  this.payload
                    .pull_request
                    .html_url;
            case GithubActivityType.CreateEvent:
                return this.repo
                    .url
                    .replace('https://api.github.com/repos/', 'https://github.com/')
                    .concat('/tree/' + this.payload.ref);
            case GithubActivityType.WatchEvent:
            default:
                return this.repo
                    .url
                    .replace('https://api.github.com/repos/', 'https://github.com/');
        }
    }
}

enum GithubActivityType {
    WatchEvent = 'WatchEvent',
    PushEvent = 'PushEvent',
    CreateEvent = 'CreateEvent',
    IssueCommentEvent = 'IssueCommentEvent',
    PullRequestEvent = 'PullRequestEvent'
}

export class GithubActivity {
    id: number;
    type: string;
    public: boolean;
    created_at: string;
    repo: { id: number; name: string, url: string };

    isWatchEvent(): boolean {
        return this.type === 'WatchEvent';
    }

    isPushEvent(): boolean {
        return this.type === 'PushEvent';
    }

    isCreateEvent(): boolean {
        return this.type === 'CreateEvent';
    }

    getHumanisedType(): string {
        switch (this.type) {
            case 'WatchEvent':
                return 'Starred';
            case 'PushEvent':
                return 'Pushed to';
            case 'CreateEvent':
                return 'Created';
            case 'IssueCommentEvent':
                return 'Commented on ';
            default:
                return this.type;
        }
    }
}

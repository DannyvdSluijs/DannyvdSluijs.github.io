import {Commit} from './Commit';

export class ActivityPayload {
    push_id: number;
    size: number;
    distinct_size: number;
    ref: string;
    ref_type: string;
    head: string;
    before: string;
    commits: Commit[] = [];
    action: string;
    issue: {};
    comment: {html_url: string};
    pull_request: {html_url: string};

}

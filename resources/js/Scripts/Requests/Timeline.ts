import { http } from "@/Scripts/HttpRequest";
import route from 'ziggy-js';

interface TimelineRequestParam {
    offset: number;
    chunk: number;
    desc: boolean;
    latest: string|0;
    author_uuid: string|0;
}

interface TimelineRespond {
    posts: Array<any>;
    hasPayload: boolean;
}

let param: TimelineRequestParam;

class TimelineRequest {

    constructor(chunk = 5, desc = true, author_uuid: string|null = null) {
        param = {
            offset: 0,
            chunk: chunk,
            desc: desc,
            latest: 0,
            author_uuid: author_uuid ?? 0,
        };
    }

    async fetch(): Promise<TimelineRespond> {
        let dataset: Array<any> = [];
        let hasPayload = false;
        await http
            .get(route('api.v1.timelines.public'), { params: { ...param } })
            .then(res => {
                dataset = res.data.posts;
                hasPayload = dataset.length > 0;
                if (hasPayload) {
                    param.latest = res.data.latest;
                    param.offset++;
                }
            })
            .catch(err => {

            });
        return {
            posts: dataset,
            hasPayload: hasPayload
        }
    }

    changeOrder() {
        param.desc = !param.desc;
        param.offset = 0;
    }
}

export default TimelineRequest;

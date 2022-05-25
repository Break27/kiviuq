
export function ellipsis(string, length) {
    return string.length > length
        ? string.substring(0, length - 1) + '…'
        : string;
}

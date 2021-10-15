// @NOTE: Import misc.
import Tag from "@js/types/Tag";

/**
 * Resume - defines the structure of resume.
 */
type Resume = {
    id: number;
    image: string;
    title: string;
    description: string;
    tags?: Tag[];
};

export default Resume;

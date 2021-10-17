// @NOTE: Import from own files.
import { post } from "@actions/requests";
import { USER_SIGN_UP_REQUEST } from "@constants/types/auth/sign-up";
import { IAction } from "@actions/action";
import User from "@js/types/User";

/**
 * ISignUpData - data that's used to sign up.
 */
export interface ISignUpData {
    first_name: string;
    second_name: string;
    email: string;
    password: string;
    password_confirmation: string;
}

/**
 * signUp - returns objects that's used by axios middleware to
 * sign up user to the website.
 *
 * @param {object} body
 *
 * @returns {IAction}
 */
export default function signUp(body: ISignUpData): IAction<User> {
    return post(`/register`, USER_SIGN_UP_REQUEST, body);
}
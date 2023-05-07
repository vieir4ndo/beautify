import { object, string, TypeOf, z } from 'zod';

export const createUserValidator = object({
    body: object({
        name: string().min(3).max(150).nonempty(),
        email: string().email().max(256).nonempty(),
        password: string().min(8).nonempty(),
        phoneNumber: string().max(14).nonempty().regex(new RegExp(/^([+]?[\s0-9]+)?(\d{3}|[(]?[0-9]+[)])?([-]?[\s]?[0-9])+$/),'Invalid phoneNumber'),
        passwordConfirm: string().min(8).nonempty(),
    }).refine((data) => data.password === data.passwordConfirm, {
        path: ['passwordConfirm'],
        message: 'Password confirmation does not match',
    }),
});

export type CreateUserInput = Omit<
    TypeOf<typeof createUserValidator>['body'],
    'passwordConfirm'
    >;

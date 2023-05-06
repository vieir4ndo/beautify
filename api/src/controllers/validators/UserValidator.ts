import { object, string, TypeOf, z } from 'zod';

export const createUserValidator = object({
    body: object({
        name: string().max(150).nonempty(),
        email: string().email().max(256).nonempty(),
        password: string().nonempty(),
        phoneNumber: string().max(14).nonempty(),
        passwordConfirm: string().nonempty(),
    }).refine((data) => data.password === data.passwordConfirm, {
        path: ['passwordConfirm'],
        message: 'Password confirmation does not match',
    }),
});

export type CreateUserInput = Omit<
    TypeOf<typeof createUserValidator>['body'],
    'passwordConfirm'
>;

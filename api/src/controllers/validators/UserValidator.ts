import { object, string, TypeOf, z } from 'zod';

export const createUserValidator = object({
    body: object({
        name: string({ required_error: 'Name is required', }).max(150, 'Name must be less than 150 characters'),
        email: string({ required_error: 'Email address is required', }).email('Invalid email address').max(256, 'Email must be less than 256 characters'),
        password: string({ required_error: 'Password is required' }),
        phoneNumber: string({ required_error: 'PhoneNumber is required' }).max(14, "PhoneNumber must be less than 14 characters"),
        passwordConfirm: string({ required_error: 'Please confirm your password' }),
    }).refine((data) => data.password === data.passwordConfirm, {
        path: ['passwordConfirm'],
        message: 'Passwords do not match',
    }),
});

export type CreateUserInput = Omit<
    TypeOf<typeof createUserValidator>['body'],
    'passwordConfirm'
>;

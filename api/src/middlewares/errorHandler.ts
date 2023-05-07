import { Request, Response } from 'express';
import { ZodError } from 'zod';
import { InvalidRequestError, NotFoundError } from '../errors';

export const errorHandler =
    (callback: any) =>
        (req: Request, res: Response) => {
            callback(req)
                .then((data) => {
                    return res.status(200).json({
                        success: true,
                        data: data,
                        errors: null,
                    });
                })
                .catch((error) => {

                    if (error instanceof InvalidRequestError || error instanceof ZodError) {
                        return res.status(400).json({
                            success: false,
                            data: null,
                            errors: error.errors,
                        });
                    }

                    if (error instanceof NotFoundError) {
                        return res.status(404).json({
                            success: false,
                            data: null,
                            errors: null,
                        });
                    }

                    if (error instanceof Error) {
                        console.log(error);

                        return res.status(500).json({
                            success: false,
                            data: null,
                            errors: "Ops, we had an error processing your request, please try again",
                        });
                    }
                });
        };


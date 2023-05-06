import { Request, Response, NextFunction } from 'express';
import { AnyZodObject, ZodError } from 'zod';
import { InvalidRequestError, NotFoundError } from '../errors';

export const validate =
    (schema: AnyZodObject) =>
        (req: Request, res: Response, next: NextFunction) => {
            try {
                schema.parse({
                    params: req.params,
                    query: req.query,
                    body: req.body,
                });

                next();
            } catch (error) {
                if (error instanceof ZodError) {
                    return res.status(400).json({
                        success: false,
                        data: null,
                        errors: error.errors,
                    });
                }

                if (error instanceof InvalidRequestError) {
                    return res.status(400).json({
                        success: false,
                        data: null,
                        errors: error.message,
                    });
                }

                if (error instanceof NotFoundError) {
                    return res.status(404).json({
                        success: false,
                        data: null,
                        errors: null,
                    });
                }

                // todo: make it work for uncaught errors
                res.status(500).json({
                    success: false,
                    data: null,
                    errors: "Ops, we had an error processing your request, please try again",
                });

                next(error);
            }
        };


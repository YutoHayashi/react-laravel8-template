export const email = ( value: string | undefined ): true | string => /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/.test( value ? value : '' ) || 'This is not an email address.';